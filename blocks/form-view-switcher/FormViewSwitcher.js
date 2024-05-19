export class FormViewSwitcher {
  constructor(params) {
    this.params = {
      ...{
        selectors: {
          group: '.form-group',
          control: '.form__control',
          switcher: '.form__view-switcher',
        },
        classes: {
          groupShowPassword: 'form-group_show-password',
        },
      },
      ...params
    }

    this.init()
  }

  init() {
    this.attachEvents()
  }

  attachEvents() {
    document.addEventListener('click', this.docClickHandler.bind(this))
  }

  docClickHandler(event) {
    let target = event.target,
      viewSwitcher = target.closest(this.params.selectors.switcher)

    if (viewSwitcher) {
      this.viewSwitcherClickHandler(viewSwitcher)
    }
  }

  viewSwitcherClickHandler(viewSwitcher) {
    let group = viewSwitcher.closest(this.params.selectors.group),
      control = group.querySelector(this.params.selectors.control)

    if (control.type === 'text') {
      group.classList.remove(this.params.classes.groupShowPassword)
      control.type = 'password'
    } else {
      group.classList.add(this.params.classes.groupShowPassword)
      control.type = 'text'
    }
  }
}