import { Accordion } from 'accordion/Accordion'

import './side-menu.mustache'

export default () => {
  const accordionEl = document.querySelector('.side-menu-list')

  if (accordionEl) {
    new Accordion({
      selectors: {
        accordion: accordionEl,
        item: '.side-menu-item',
        trigger: '.side-menu-item__trigger',
        hidden: '.side-submenu'
      },
      classes: {
        opened: 'side-menu-item_opened',
        initialItem: 'side-menu-item_active'
      }
    })
  }
}