import detailGallery from 'detail-gallery/detail-gallery'
import detailShare from 'detail-share/detail-share'
import { updateNoticePosition } from 'products-list/updateNoticePosition'

import './detail-top.mustache'

export default ({ tabsInstance }) => {
  detailGallery()
  detailShare()
  initProps()
  updateNoticePosition(document.querySelector('.detail-top'), {
    notice: '.detail-price-notice',
    noticeTip: '.detail-price-notice-tip',
    leftClass: 'detail-price-notice-tip_pull-left',
    rightClass: 'detail-price-notice-tip_pull-right'
  })

  function initProps() {
    const propsBtn = document.querySelector('.detail-props__button')
    const tabsElement = document.querySelector('.detail-tabs')

    if (propsBtn && tabsElement && tabsInstance) {
      propsBtn.addEventListener('click', () => {
        window.scrollTo({
          top: tabsElement.offsetTop,
          behavior: 'smooth'
        })
        tabsInstance.changeActiveTab('chars')
      })
    }
  }
}