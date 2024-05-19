import { fetch as fetchPolyfill } from 'whatwg-fetch'

export class InfiniteButton {
  constructor(params) {
    this.loading = false
    this.params = {
      ...{
        beforeCallback: null, // функция обратного вызова до отправки запроса
        afterLoadCallback: null, // функция обратного вызова после получения ответа
        afterInsertCallback: null, // функция обратного вызова после получения ответа
        loading: false,
        loadText: 'Загрузка...',
        selectors: {
          wrapper: '.infinite-wrapper', // обертка. здесь лежат элементы и ссылка показать еще
          linkWrapper: '.search-page-navigation', // обертка ссылки показать еще
          link: '.infinity-button', // ссылка показать еще
          linkText: '.infinity-button__text', // текст ссылки
          item: '.catalog-card', // загружаемые элементы
        },
        classes: {
          linkActive: 'infinity-button_active', // класс который добавляется ссылке, когда идет аякс запрос
          itemHide: 'catalog-card_hide', // класс который плавно покажет загруженные элементы
        },
      },
      ...params
    }

    this.init()
  }

  init() {
    this.selectors = this.params.selectors
    this.classes = this.params.classes

    if (this.selectors.link) {
      this.attachEvents()
    }
  }

  attachEvents() {
    document.addEventListener('click', this.docClickHandler.bind(this))
  }

  docClickHandler(event) {
    let link = event.target.closest(this.selectors.link)

    if (link) {
      this.load(link)
    }
  }

  async load(link) {
    if (!this.loading) {
      const compId = link.dataset['compId']
      let endpoint = link.dataset['endpoint']

      if (endpoint) {
        const linkText = link.querySelector(this.params.selectors.linkText)

        endpoint = this.prepareEndpoint(endpoint, compId)

        this.beforeLoad(linkText)

        const response = await fetchPolyfill(endpoint)

        if (response.ok) {
          const data = await response.text(),
            wrapper = link.closest(this.selectors.wrapper),
            linkWrapper = link.closest(this.selectors.linkWrapper)

          linkWrapper && linkWrapper.remove()

          if (data && wrapper) {
            this.insertHtml(wrapper, data)
          }
        }

        this.afterLoad()
      }
    }
  }

  beforeLoad(linkText) {
    this.loading = true

    linkText.innerText = this.params.loadText

    if (this.params.beforeCallback && typeof this.params.beforeCallback === 'function') {
      this.params.beforeCallback()
    }
  }

  prepareEndpoint(endpoint, compId) {
    if (endpoint.toString().search('is_ajax=y') === -1) {
      endpoint += (endpoint.includes('?') ? '&' : '?') + 'is_ajax=y'

    }

    if (compId && endpoint.toString().search(`compId=${compId.toString()}`) === -1) {
      endpoint += (endpoint.includes('?') ? '&' : '?') + `compId=${compId.toString()}`
    }

    return endpoint
  }

  insertHtml(wrapper, data) {
    wrapper.innerHTML += data

    if (this.params.afterInsertCallback && typeof this.params.afterInsertCallback === 'function') {
      this.params.afterInsertCallback(wrapper, data)
    }

    if (this.selectors.item) {
      setTimeout(() => {
        const itemList = document.querySelectorAll(this.selectors.item + '.' + this.classes.itemHide)

        if (itemList.length > 0) {
          itemList.forEach(item => {
            item.classList.remove(this.classes.itemHide)
          })
        }
      })
    }
  }

  afterLoad() {
    this.loading = false

    if (this.params.afterLoadCallback && typeof this.params.afterLoadCallback === 'function') {
      this.params.afterLoadCallback()
    }
  }
}
