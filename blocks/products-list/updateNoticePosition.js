export const updateNoticePosition = (parentEl, { notice, noticeTip, leftClass, rightClass, viewAreaEl }) => {
  if (!parentEl) {
    console.error('Не найден объект с иконкой подсказки')
  }

  const noticeEl = parentEl.querySelector(notice)

  if (noticeEl) {
    const noticeTipEl = noticeEl.querySelector(noticeTip)
    noticeTipEl.classList.remove(leftClass, rightClass)

    const noticeTipCenterPos = noticeTipEl.getBoundingClientRect().left + noticeTipEl.clientWidth / 2

    let viewArea = {
      left: 0,
      right: window.innerWidth
    }

    if (viewAreaEl instanceof HTMLElement) {
      viewArea.left = viewAreaEl.getBoundingClientRect().left
      viewArea.right = viewAreaEl.getBoundingClientRect().right
    }

    if (noticeTipCenterPos - noticeTipEl.clientWidth / 2 < viewArea.left) {
      noticeTipEl.classList.add(rightClass)
    } else if (noticeTipCenterPos + noticeTipEl.clientWidth / 2 > viewArea.right) {
      noticeTipEl.classList.add(leftClass)
    }
  }
}