import { formatFileSize } from "../helpers/formatNumber"

export class FormFile {
  constructor(form, params) {
    this.params = {
      ...{
        selectors: {
          wrapper: '.form-file-wrapper',
          file: '.form-file',
          control: '.form-file__control',
          filename: '.form-file__filename',
          filenameComplete: '.form-file__filename_complete',
          dropzone: '.form-file__dropzone',
          closeBtn: '.form-file__close'
        },
        classes: {
          dropzone: 'form-file__dropzone',
          fileFilled: 'form-file_filled',
          fileDraggedEnter: 'form-file_dragged-enter',
        }
      },
      ...params
    }

    if (form) {
      this.init(form)
    }
  }

  init(form) {
    this.selectors = this.params.selectors
    this.classes = this.params.classes

    this.form = typeof form === 'string' ? document.querySelector(form) : form

    if (this.form) {
      this.attachEvents()
    }
  }

  attachEvents() {
    const fileControlList = this.form.querySelectorAll(this.selectors.control)

    this.onControlChange = this.onControlChange.bind(this)

    if (fileControlList.length) {
      fileControlList.forEach(control => {
        control.addEventListener('change', this.onControlChange)
      })
    }

    document.addEventListener('click', this.docClickHandler.bind(this))
    document.addEventListener('drop', this.onDropHandler.bind(this))
    document.addEventListener('dragover', this.onDragOverHandler.bind(this))
    document.addEventListener('dragleave', this.onDragLeaveHandler.bind(this))
  }

  onControlChange(event) {
    const control = event.target,
      fileEl = control.closest(this.selectors.file),
      fileNameComplete = fileEl.querySelector(this.selectors.filenameComplete)

    if (fileEl) {
      if (control.files && control.files.length) {
        fileEl.classList.add(this.classes.fileFilled)
        fileEl.classList.remove(this.classes.fileDraggedEnter)
        this.handleFileNames(Array.from(control.files), fileNameComplete)
      } else {
        fileEl.classList.remove(this.classes.fileFilled)
        fileEl.classList.remove(this.classes.fileDraggedEnter)
        fileNameComplete.innerText = ""
      }
    }
  }

  handleFileNames(files, fileNameComplete) {
    fileNameComplete.innerText = files.reduce((acc, file) => acc += `${file.name} (${formatFileSize(file.size)})\n`, "")
  }

  onDragOverHandler(event) {
    const dropzone = event.target

    if (dropzone.classList.contains(this.classes.dropzone)) {
      event.preventDefault()

      const fileEl = dropzone.closest(this.selectors.file)

      fileEl.classList.add(this.classes.fileDraggedEnter)
    }
  }

  onDragLeaveHandler(event) {
    const dropzone = event.target

    if (dropzone.classList.contains(this.classes.dropzone)) {
      event.preventDefault()

      const fileEl = dropzone.closest(this.selectors.file)

      fileEl.classList.remove(this.classes.fileDraggedEnter)
    }
  }

  onDropHandler(event) {
    const dropzone = event.target

    if (dropzone.classList.contains(this.classes.dropzone)) {
      event.preventDefault()

      const fileEl = dropzone.closest(this.selectors.file),
        control = fileEl.querySelector(this.selectors.control),
        fileTypes = control.getAttribute("accept"),
        files = event.dataTransfer.files,
        filesArr = Array.from(event.dataTransfer.files)

      if (files && files.length && (!fileTypes || this.checkFileTypes(fileTypes, files))) {
        this.activateFileFilled(fileEl, filesArr)
        this.appendFiles(control, files)

        return true
      }

      this.deactivateFileFilled(fileEl)
    }
  }

  checkFileTypes(fileTypes, fileList) {
    if (fileTypes && fileList) {
      return Array.prototype.some.call(fileList, file => fileTypes.replace(/\s/g, '').split(',').filter(accept => {
        return new RegExp(accept.replace('*', '.*')).test(file.type);
      }).length > 0)
    }

    return false
  }

  docClickHandler(event) {
    const closeBtn = event.target.closest(this.selectors.closeBtn)

    if (closeBtn) {
      const fileEl = closeBtn.closest(this.selectors.file)

      this.removeFile(fileEl)
    }
  }

  appendFiles(control, files) {
    control.files = files
    control.dispatchEvent(new Event('change', {bubbles: true}))
  }

  removeFile(fileEl) {
    const control = fileEl.querySelector(this.selectors.control)

    if (control) {
      control.value = ""
      control.dispatchEvent(new Event('change', {bubbles: true}))
      this.deactivateFileFilled(fileEl)
    }
  }

  activateFileFilled(fileEl, files) {
    const fileNameComplete = fileEl.querySelector(this.selectors.filenameComplete)

    fileEl.classList.remove(this.classes.fileDraggedEnter)
    fileEl.classList.add(this.classes.fileFilled)
    this.handleFileNames(files, fileNameComplete)
  }

  deactivateFileFilled(fileEl) {
    const fileNameComplete = fileEl.querySelector(this.selectors.filenameComplete)

    fileEl.classList.remove(this.classes.fileDraggedEnter)
    fileEl.classList.remove(this.classes.fileFilled)
    fileNameComplete.innerText = ""
  }

  // метод для очистки контрола после валидации
  clearControl(control) {
    if (control) {
      const fileEl = control.closest(this.selectors.file)

      control.value = ""
      this.deactivateFileFilled(fileEl)
    }
  }
}