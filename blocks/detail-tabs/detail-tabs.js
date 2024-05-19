import { Tab } from 'tab/Tab'
import { Swiper } from 'swiper'
import { FreeMode } from 'swiper/modules'

import './detail-tabs.mustache'

export default () => {
  const tabsEl = document.querySelector('.detail-tabs')
  let tabsInstance = null

  if (tabsEl) {
    tabsInstance = new Tab({
      selectors: {
        tab: tabsEl,
        link: '.detail-tabs-link',
        panel: '.detail-tabs-panel',
        panelContainer: '.detail-tabs-panels'
      },
      classes: {
        panelIn: 'detail-tabs-panel_in',
        panelActive: 'detail-tabs-panel_active',
        panel: 'detail-tabs-panel',
        linkActive: 'detail-tabs-link_active'
      }
    })

    new Swiper('.detail-tabs-links-list', {
      modules: [ FreeMode ],
      slidesPerView: 'auto',
      threshold: 20,
      spaceBetween: 30,
      freeMode: true,
      watchOverflow: true
    })
  }

  return tabsInstance
}