import Inputmask from "inputmask";
import Mustache from "mustache";
import { FormSelect } from 'form-select/FormSelect'
import { FormFile } from 'form-file/FormFile'

window._ = {
    merge: require('lodash/merge'),
}

/** Класс для обработки форм обратной связи и отправки введенных данных на сервер */

export class FeedbackForm {
    /**
     * Конструктор объекта
     * @constructor
     * @param {string} formSelector - Селектор для элемента формы
     * @param {Object} params - Объект параметров класса
     */
    constructor(formSelector, params = {}) {
        this.params = {
            selectors: {
                group: '.form-group',
                control: '.form__control',
                password: '.form__control_password',
                passwordConfirm: '.form__control_password-confirm',
                groupNote: '.form-group__message',
                filename: '.form__filename',
                submit: '.form__submit',
                uc: '.form-uc__control'
            },
            classes: {
                controlTypeText: 'form__control_text',
                controlTypePassword: 'form__control_password',
                controlTypePasswordConfirm: 'form__control_password-confirm',
                controlTypeEmail: 'form__control_email',
                controlTypeTel: 'form__control_tel',
                controlTypeDate: 'form__control_date',
                controlTypeSelect: 'form__control_select',
                controlTypeCheckbox: 'form__control_checkbox',
                controlTypeRadio: 'form__control_radio',
                controlTypeTextarea: 'form__control_textarea',
                controlTypeFile: 'form__control_file',
                controlValidEmail: 'form__control_valid-email',
                controlValidTel: 'form__control_valid-tel',
                controlValidEmailTel: 'form__control_valid-email-tel',
                controlValidTextRu: 'form__control_valid-text-ru',
                controlValidFileSize: 'form__control_valid-file-size',
                controlRequired: 'form__control_required',
                groupHasError: 'form-group_has-error',
                groupValid: 'form-group_valid',
                noteActive: 'form-group__message_active',
                formInit: 'form_init'
            },
            errorList: {
                required: 'Это обязательное поле',
                invalidPhone: 'Поле не соответствует формату телефона',
                invalidEmail: 'Поле не соответствует формату эл. почты',
                invalidEmailPhone: 'Поле не соответствует формату телефона или эл. почты',
                invalidTextRu: 'Поле не соответствует формату текста на русском языке',
                invalidFileSize: 'Слишком большой размер файла',
                invalidPassword: 'Пароль не соответствует формату',
                invalidConfirmPassword: "Пароли не совпадают"
            },
            options: {
                disableSubmitButtonOnError: true,
                showErrorMessages: false,
                validateOnInput: true,
                validateOnChange: true,
                minPhoneLength: 6,
                minPasswordLength: 1
            },
            successMessageTemplate: '#feedback-success-message',
            onSuccess: null,
            isAjaxSubmit: true,
            _active: true,
        }
        _.merge(this.params, params)

        this.init(formSelector)
    }

    /**
     * Инициализация объекта
     * @param {string} formSelector - Селектор для элемента формы
     */
    init(formSelector) {
        this.selectors = this.params.selectors
        this.classes = this.params.classes
        this.options = this.params.options
        this.errorsList = this.params.errorList

        this.phoneMaskInstance = null

        if (formSelector) {
            this.form = document.querySelector(formSelector)

            if (this.form) {
                this.attachEvents()
                this.initPlugins()
                this.form.classList.add(this.classes.formInit)
            }
        }
    }

    /**
     * Добавление обработчиков событий формы
     */
    attachEvents() {
        this.form.addEventListener('submit', this.formSubmitHandler.bind(this))

        if (this.options.validateOnInput) {
            this.form.addEventListener('input', this.changeControlHandler.bind(this))
        }

        if (this.options.validateOnChange) {
            this.form.addEventListener('change', this.changeControlHandler.bind(this))
        }
    }

    /**
     * Инициализация плагинов
     */
    initPlugins() {
        let phoneControlList = this.form.querySelectorAll('.' + this.classes.controlTypeTel),
          dateControlList = this.form.querySelectorAll('.' + this.classes.controlTypeDate),
          selectControlList = this.form.querySelectorAll('.' + this.classes.controlTypeSelect),
          fileControlList = this.form.querySelectorAll('.' + this.classes.controlTypeFile)

        if (phoneControlList.length) {
            this.phoneMaskInstance = new Inputmask({
                mask: '+7 (999) 999-99-99',
                showMaskOnHover: false,
            }).mask(phoneControlList)
        }

        if (dateControlList.length) {
            new Inputmask({
                mask: '99.99.9999',
                showMaskOnHover: false,
            }).mask(dateControlList)
        }

        if (selectControlList.length) {
            new FormSelect()
        }

        if (fileControlList.length) {
            this.filePlugin = new FormFile(this.form)
        }
    }

    /**
     * Обработчик события изменения значения элемента формы
     * @param {Event} event - Объект события
     */
    changeControlHandler(event) {
        const control = event.target.closest(this.selectors.control)

        if (control) {
            if (this.options.validateOnChange) {
                const errors = this.controlValidation(control)

                if (errors.length === 0) {
                    this.controlValid(control)
                } else {
                    this.controlHasError(control, errors)
                }

                if (this.options.disableSubmitButtonOnError) {
                    this.disableSubmitButton(errors.length === 0)
                }
            }

            if (control.classList.contains(this.classes.controlTypeRadio)) {
                const formGroup = control.closest('.form-group')
                if (formGroup) {
                    formGroup.dataset.value = control.value
                }
            }
        }

        const uc = this.selectors.uc && event.target.closest(this.selectors.uc)

        if (uc) {
            this.disableSubmitButton(this.ucValidation())
        }
    }

    /**
     * Обработчик события отправки формы
     * @param {Event} event - Объект события
     */
    formSubmitHandler(event) {
        this.disableSubmitButton()

        if (this.formValidation()) {
            if (this.params.isAjaxSubmit) {
                event.preventDefault()
                this.submitForm()
            } else {
                this.disableSubmitButton(true)
            }
        } else {
            event.preventDefault()
        }
    }

    /**
     * Событие до отправки формы
     */
    beforeSubmit() {
        this.disableSubmitButton()
    }

    /**
     * Отправка формы
     */
    submitForm() {
        const formData = this.prepareFormData(),
          endpoint = this.form.action || '/'

        this.beforeSubmit()

        fetch(endpoint, {
            method: 'POST',
            body: formData,
            headers: {
                'x-requested-with': 'xmlhttprequest'
            },
        }).then(response => {
            if (response.ok) {
                response.json()
                  .then(data => {
                      this.disableSubmitButton(true)
                      this.resetForm()

                      if (data.data) {
                          this.showMessage({
                              title: data.data.successMessageTitle,
                              text: data.data.successMessage,
                              showCatalogLink: data.data.showCatalogLink,
                          })
                      }

                      if (window.yandexMetricsInstance) window.yandexMetricsInstance.reachGoals(data.ya_goals)

                      if (window.googleMetricsInstance) window.googleMetricsInstance.reachGoals(data.ga_goals)

                      if (this.params.onSuccess && typeof this.params.onSuccess === 'function') {
                          this.params.onSuccess()
                      }
                  })
                  .catch(e => {
                      this.disableSubmitButton(true)

                      console.error(e)
                  })
            } else {
                this.showServerError()
            }
        })
          .catch(message => this.showServerError(message))

        this.afterSubmit()
    }

    /**
     * Событие непосредственно после отправки формы
     */
    afterSubmit() {

    }

    /**
     * Сбор данных из полей формы
     * @return {FormData} Тип проверки
     */
    prepareFormData() {
        const formData = new FormData(this.form)
        const compid = this.form.getAttribute('id')

        if (compid) {
            formData.append('compid', compid)
        }

        formData.append('action', 'submit')

        return formData
    }

    /**
     * Вывод ошибок, связанных с отправкой ajax-запроса
     */
    showServerError(message = 'Ошибка отправки') {
        console.error(message)
    }

    /**
     * Показ модального окна с сообщением
     * @param {object} messageContext - Контекст для шаблона сообщения
     */
    showMessage(messageContext) {
        const successMessageTemplateElement = document.querySelector(this.params.successMessageTemplate)

        if (Mustache && successMessageTemplateElement) {
            let successMessageTemplate = successMessageTemplateElement.innerHTML

            Fancybox.show([
                {
                    html: Mustache.render(successMessageTemplate, messageContext),
                    type: 'inline'
                }
            ], {
                template: {
                    closeButton: '',
                },
                mainClass: 'custom-fancybox success-message-fancybox',
                dragToClose: false,
                autoFocus: false,
                trapFocus: false
            })
        }
    }

    /**
     * Валидация формы
     * @return {string} Результат валидации
     */
    formValidation() {
        let isValid = true

        const controlList = this.form.querySelectorAll(
          this.params.selectors.control
        )

        controlList.forEach(control => {
            let errors = this.controlValidation(control)

            if (errors.length === 0) {
                this.controlValid(control)
            } else {
                isValid = false
                this.controlHasError(control, errors)
            }
        })
        if (!this.ucValidation()) {
            isValid = false

            this.disableSubmitButton(isValid)
        }

        if (this.options.disableSubmitButtonOnError) {
            this.disableSubmitButton(isValid)
        }

        return isValid
    }

    /**
     * Проверка галочки согласия
     * @return {boolean} Результат проверки
     */
    ucValidation() {
        let uc = this.selectors.uc && this.form.querySelector(this.selectors.uc)

        if (uc) {
            return uc.checked
        }

        return true
    }

    /**
     * Валидация элемента формы
     * @param {HTMLElement} control - Элемент формы
     * @return {array} Массив ошибок
     */
    controlValidation(control) {
        const validation = this.getControlValidation(control),
          type = this.getControlType(control),
          errors = []

        if (type === 'tel') {
            const first8pattern = /^8*$/
            const unmaskedValue = control.inputmask.unmaskedvalue()

            if (first8pattern.test(unmaskedValue)) {
                control.inputmask.remove()
                control.value = ''
                this.phoneMaskInstance.mask(control)
                control.setSelectionRange(4, 4)
            }
        }

        if (control.classList.contains(this.params.classes.controlRequired)) {
            if (!control.disabled && !this.checkRequiredControl(control, type)) {
                errors.push(this.errorsList.required)
            }
        }

        if (type === 'password') {
            let password, passwordConfirm

            if (!control.classList.contains(this.classes.controlTypePasswordConfirm)) {
                password = control
                passwordConfirm = this.form.querySelector(this.selectors.passwordConfirm)

                if (passwordConfirm && !this.checkPasswordConfirmation(control, passwordConfirm)) {
                    errors.push(this.errorsList.invalidConfirmPassword)
                }
            } else {
                password = this.form.querySelector(`${this.selectors.password}:not(${this.selectors.passwordConfirm})`)

                if (password) password.dispatchEvent(new Event('change'))
            }

            if (!this.passwordValidation(control)) errors.push(this.errorsList.invalidPassword)
        }

        switch (validation) {
            case 'email':
                if (control.value && !this.emailValidation(control)) {
                    errors.push(this.errorsList.invalidEmail)
                }
                break;
            case 'tel':
                if (control.value && !this.telValidation(control)) {
                    errors.push(this.errorsList.invalidPhone)
                }
                break;
            case 'emailOrTel':
                if (control.value && (this.emailValidation(control) || this.telValidation(control))) {
                    errors.push(this.errorsList.invalidEmailPhone)
                }
                break;
            case 'textRu':
                if (control.value && !this.textRuValidation(control)) {
                    errors.push(this.errorsList.invalidTextRu)
                }
                break;
            case 'fileSize':
                if (!this.fileSizeValidation(control)) {
                    errors.push(this.errorsList.invalidFileSize)
                }
                break;
        }

        return errors
    }

    /**
     * Получение типа элемента формы
     * @param {HTMLElement} control - Элемент формы
     * @return {string} Тип элемента
     */
    getControlType(control) {
        if (
          control.classList.contains(this.params.classes.controlTypePassword)
        ) {
            return 'password'
        }

        if (control.classList.contains(this.params.classes.controlTypeEmail)) {
            return 'email'
        }

        if (control.classList.contains(this.params.classes.controlTypeCheckbox)) {
            return 'checkbox'
        }

        if (control.classList.contains(this.params.classes.controlTypeRadio)) {
            return 'radio'
        }

        if (control.classList.contains(this.params.classes.controlTypeTel)) {
            return 'tel'
        }

        if (
          control.classList.contains(this.params.classes.controlTypeTextarea)
        ) {
            return 'textarea'
        }

        return 'text'
    }

    /**
     * Получение типа доп. проверки для элемента формы
     * @param {HTMLElement} control - Элемент формы
     * @return {string} Тип проверки
     */
    getControlValidation(control) {
        if (control.classList.contains(this.params.classes.controlValidEmail)) {
            return 'email'
        }

        if (control.classList.contains(this.params.classes.controlValidTel)) {
            return 'tel'
        }

        if (
          control.classList.contains(this.params.classes.controlValidEmailTel)
        ) {
            return 'emailOrTel'
        }

        if (
          control.classList.contains(this.params.classes.controlValidTextRu)
        ) {
            return 'textRu'
        }

        if (
          control.classList.contains(this.params.classes.controlValidFileSize)
        ) {
            return 'fileSize'
        }
    }

    /**
     * Проверка значения поля - адрес электронной почты
     * @param {HTMLElement} control - Элемент формы
     * @return {boolean} Результат проверки
     */
    emailValidation(control) {
        const pattern = /^([a-zA-Z0-9_\.\-])+@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/

        return pattern.test(control.value)
    }

    /**
     * Проверка значения поля - телефонный номер
     * @param {HTMLElement} control - Элемент формы
     * @return {boolean} Результат проверки
     */
    telValidation(control) {
        const pattern = /^[0-9() +-]+$/

        if (control.value.length < this.params.options.minPhoneLength) {
            return false
        }

        return pattern.test(control.value)
    }

    /**
     * Проверка значения поля - только буквы русского алфавита
     * @param {HTMLElement} control - Элемент формы
     * @return {boolean} Результат проверки
     */
    textRuValidation(control) {
        const pattern = /^[а-яА-Яёй -]+$/

        return pattern.test(control.value)
    }

    /**
     * Проверка элемента типа пароль
     * @param {HTMLElement} control - Элемент формы
     * @return {boolean} Результат проверки
     */
    passwordValidation(control) {
        return control.value.length >= this.params.options.minPasswordLength
    }

    /**
     * Проверка размеров файла
     * @param {HTMLElement} control - Элемент формы
     * @return {boolean} Результат проверки
     */
    fileSizeValidation(control) {
        const koef = 1024
        const maxSize = +control.dataset.maxsize
        const files = control.files

        if (files.length === 0) {
            return true
        }

        for (let i = 0; i < files.length; i ++) {
            if (files[i].size > maxSize * koef ** 2) {
                return false
            }
        }

        return true
    }

    /**
     * Проверка совпадения значений у элемента пароля и подтверждения пароля
     * @param {HTMLElement} password - Элемент формы
     * @param {HTMLElement} passwordConfirm - Элемент формы
     * @return {boolean} Результат проверки
     */
    checkPasswordConfirmation(password, passwordConfirm) {
        if (passwordConfirm) {
            return passwordConfirm.value.toString() === password.value.toString()
        } else {
            return true
        }
    }

    /**
     * Проверка наличия значения у элемента
     * @param {HTMLElement} control - Элемент формы
     * @param {string} type - Тип элемента
     * @return {boolean} Результат проверки
     */
    checkRequiredControl(control, type) {
        if (type === 'checkbox' || type === 'radio') {
            return control.checked
        }

        return !!control.value
    }

    /**
     * Отменяет состояние ошибки у поля формы
     * @param {HTMLElement} control - Элемент формы
     */
    controlValid(control) {
        const group = this.getControlGroup(control)
        let note = group.querySelector(this.params.selectors.groupNote)

        group.classList.remove(this.params.classes.groupHasError)
        group.classList.add(this.params.classes.groupValid)

        if (note) {
            note.classList.remove(this.classes.noteActive)
            note.innerText = ''
        }
    }

    /**
     * Вызывает состояние ошибки у поля формы, если есть поле для сообщений,
     * выводит сообщение об ошибке
     * @param {HTMLElement} control - Элемент формы
     * @param {Array} errors - Массив ошибок
     */
    controlHasError(control, errors) {
        let group = this.getControlGroup(control),
          note = group.querySelector(this.params.selectors.groupNote)

        group.classList.add(this.params.classes.groupHasError)
        group.classList.remove(this.params.classes.groupValid)

        if (this.options.showErrorMessages && note && errors) {
            note.classList.add(this.classes.noteActive)
            note.innerText = errors.reduce((error, acc) => acc += ';\n' + error, '').slice(0, -2)
        }
    }

    /**
     * Возвращает элемент группы для поля
     * @return {HTMLElement} Элемент формы
     */
    getControlGroup(control) {
        return control.closest(this.selectors.group)
    }

    /**
     * Закрывает кнопку отправки формы
     * @param {boolean} off - Открыть кнопку отправки формы
     */
    disableSubmitButton(off = false) {
        let submit = this.form.querySelector(this.selectors.submit)

        if (submit) {
            submit.disabled = !off
        }
    }

    /**
     * Сброс полей формы, галочка согласия проставлена
     */
    resetForm() {
        this.form.reset()

        const controls = this.form.querySelectorAll(this.selectors.control)

        if (controls.length) {
            controls.forEach((control) => {
                control.dispatchEvent(new Event('reset', {bubbles: true}))
            })
        }

        let uc = this.selectors.uc && this.form.querySelector(this.selectors.uc)

        if (uc) {
            uc.checked = true
        }
    }
}