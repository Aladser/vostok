import 'header-logo/header-logo.mustache'
import 'header-contacts/header-contacts.mustache'
import 'header-menu-toggle/header-menu-toggle.mustache'
import 'header-menu/header-menu.mustache'
import 'header-person/header-person.mustache'
import 'header-currency/header-currency.mustache'
import 'contacts-popup/contacts-popup.mustache'
import 'mobile-menu/mobile-menu.mustache'

import headerLocation from 'header-location/header-location'
import { isDesktop } from 'helpers/responsiveChecks'

export class Header {
  constructor() {
    this._menuOpened = false
    this._resizeTimer = null
    this.compactMode = false

    this.init()
  }

  init() {
    headerLocation()
    this.initHeader()
    this.initMobileMenu()
  }

  initHeader() {
    this.header = document.querySelector('.header')
  }

  initMobileMenu() {
    this.mobileMenu = document.querySelector('.mobile-menu')

    if (!this.mobileMenu) {
      console.error('MobileMenu: элемент мобильного меню не найден')
    } else {
      this.attachEvents()
      this.attachMobileMenuEvents()
    }
  }

  attachEvents() {
    window.addEventListener('resize', () => {
      clearTimeout(this._resizeTimer)

      this._resizeTimer = setTimeout(this.resizeHandler.bind(this), 300)
    })

    window.addEventListener('scroll', () => {
      this.scrollHandler()
    })

    this.scrollHandler()
  }

  resizeHandler() {
    if (isDesktop() && this._menuOpened) {
      this.closeMenu()
    }
  }

  scrollHandler() {
    if (window.scrollY > 50) {
      if (!this.compactMode) {
        this.compactMode = true
        this.header.classList.add('header_compact')
      }
    } else {
      if (this.compactMode) {
        this.compactMode = false
        this.header.classList.remove('header_compact')
      }
    }
  }

  attachMobileMenuEvents() {
    this.attachToggleEvents()
    this.attachSubmenuTriggers()
  }

  attachToggleEvents() {
    this.trigger = document.querySelector('.header-menu-toggle')

    if (this.trigger) {
      this.trigger.addEventListener('click', () => {

        if (this._menuOpened) {
          this.closeMenu()
        } else {
          this.openMenu()
        }
      })
    }
  }

  openMenu() {
    this.trigger.classList.add('header-menu-toggle_open')
    this.mobileMenu.classList.add('mobile-menu_open')
    document.body.classList.add('page_no-scroll')

    this._menuOpened = true
  }

  closeMenu() {
    this.trigger.classList.remove('header-menu-toggle_open')
    this.mobileMenu.classList.remove('mobile-menu_open')
    document.body.classList.remove('page_no-scroll')
    this._menuOpened = false

    this.closeAllSubmenu()
  }

  attachSubmenuTriggers() {
    this.mobileMenu.addEventListener('click', ({ target }) => {

      if (target.classList.contains('mobile-menu-item__btn-submenu')
        || target.closest('.mobile-menu-item__btn-submenu')) {

        const submenu = target.closest('.mobile-menu-item').querySelector('.mobile-submenu')
        submenu.classList.add('mobile-submenu_open')
      }

      if (target.classList.contains('mobile-submenu__back-btn')
        || target.closest('.mobile-submenu__back-btn')) {

        const submenu = target.closest('.mobile-submenu')
        submenu.classList.remove('mobile-submenu_open')
      }
    })
  }

  closeAllSubmenu() {
    const menus = Array.from(document.querySelectorAll('.mobile-submenu_open'))
    menus.forEach(menu => menu.classList.remove('mobile-submenu_open'))
  }
}