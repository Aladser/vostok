export class Tab {
    constructor(params) {
        this.params = {
            ...{
                selectors: {
                    tab: '.tab',
                    link: '.tab__link',
                    panel: '.tab-panel',
                    panelContainer: '.tab-panels'
                },
                classes: {
                    panelIn: "tab-panel_in",
                    panelActive: "tab-panel_active",
                    panel: "tab-panel",
                    linkActive: 'tab__link_active'
                },
                onInit: false,
                onChange: false,
                onPanelShow: false,
                initialTab: false,
                handleURI: false,
                animationSpeed: 300,
                _animationInProgress: false,
                _resizeTimer: null,
                _resizeContainerTimer: null,
                _active: true
            },
            ...params
        }

        this.init()
        this.attachEvents()
    }

    init() {
        this.selectors = this.params.selectors
        this.classes = this.params.classes
        this.initialTab = this.params.initialTab
        this.animationSpeed = this.params.animationSpeed
        this.initElements()

        if (this.params._active) {
            this.showFirstPanel()
            this.hideAllPanels()

            if (this.params.onInit && typeof this.params.onInit === 'function') {
                this.params.onInit()
            }
        }
    }

    initElements() {
        this.tab = this.selectors.tab instanceof HTMLElement ? this.selectors.tab : document.querySelector(this.selectors.tab)
        this.tabLinks = this.tab.querySelectorAll(this.selectors.link)
        this.panelContainer = this.tab.querySelector(this.selectors.panelContainer)
        this.panels = this.panelContainer.querySelectorAll(this.selectors.panel)
    }

    attachEvents() {
        this.tabLinks.forEach(link => link.addEventListener('click', this.linkClickHandler.bind(this)))
        window.addEventListener('resize', this.windowResizeHandler.bind(this))
    }

    hideAllPanels() {
        this.panels.forEach(panel => panel.classList.add(this.classes.panel))
    }

    showFirstPanel() {
        if (this.params.handleURI) {
            this.handleURI()
        }

        if (!this.params.initialTab) {
            let tabLink = Array.prototype.find.call(this.tabLinks, tabLink => {
                return !!tabLink.dataset['tab']
            })

            this.params.initialTab = tabLink.dataset['tab']
        }

        const panel = this.panelContainer.querySelector(`${this.selectors.panel}[data-tab="${this.params.initialTab}"]`)
        const link = this.tab.querySelector(`${this.selectors.link}[data-tab="${this.params.initialTab}"]`)

        if (panel) {
            link.classList.add(this.classes.linkActive)
            this.showPanel(panel)
        }
    }

    handleURI() {
        const hash = document.location.hash;

        if (hash) {
            let panel = Array.prototype.find.call(this.panels, panel => {
                return panel.dataset['tab'] === hash.slice(1)
            })

            if (panel && panel.dataset['tab']) {
                this.params.initialTab = panel.dataset['tab']
            }
        }

        return false;
    }

    preparePanelContainer(panel) {
        clearTimeout(this.params._resizeContainerTimer)

        this.panelContainer.style.height = panel.clientHeight + 'px'
    }

    setPanelContainerHeight(nextPanel) {
        const panelHeight = nextPanel.clientHeight

        if (panelHeight !== 0) {
            clearTimeout(this.params._resizeContainerTimer)

            this.params._resizeContainerTimer = setTimeout(() => {
                this.panelContainer.style.height = panelHeight + 'px'

                setTimeout(() => {
                    this.panelContainer.style.removeProperty('height')
                }, this.animationSpeed)
            }, this.animationSpeed)
        }
    }

    linkClickHandler(event) {
        if (this.params._active && !this.params._animationInProgress) {
            const link = event.currentTarget,
              linkTabID = link.getAttribute('data-tab')

            this.changeActiveTab(linkTabID)
        }
    }

    changeActiveTab(tabID) {
        const currentLink = this.tab.querySelector(`.${this.classes.linkActive}`)
        const targetLink = this.tab.querySelector(`${this.selectors.link}[data-tab="${tabID}"]`)

        if (currentLink !== targetLink) {

            const currentPanel = this.panelContainer.querySelector(`${this.selectors.panel}.${this.classes.panelActive}`)
            const nextPanel = this.panelContainer.querySelector(`${this.selectors.panel}[data-tab="${tabID}"]`)

            if (nextPanel) {
                this.params._animationInProgress = true

                if (currentPanel) {
                    this.preparePanelContainer(currentPanel)
                    this.hidePanel(currentPanel)
                }

                setTimeout(() => {
                    this.showPanel(nextPanel)
                }, this.animationSpeed)

                currentLink.classList.remove(this.classes.linkActive)
                targetLink.classList.add(this.classes.linkActive)

                if (this.params.handleURI) {
                    this.changeURIHash(tabID);
                }
            }

            if (this.params.onChange && typeof this.params.onChange === 'function') {
                this.params.onChange(event, currentPanel, nextPanel)
            }
        }
    }

    changeURIHash(hash) {
        document.location.hash = '#' + hash;
    }

    hidePanel(currentPanel) {
        currentPanel.classList.remove(this.classes.panelIn)

        setTimeout(() => {
            currentPanel.classList.remove(this.classes.panelActive)
        }, this.animationSpeed)
    }

    showPanel(nextPanel) {
        if (nextPanel) {
            nextPanel.classList.add(this.classes.panelActive)

            setTimeout(() => {
                this.setPanelContainerHeight(nextPanel)
                nextPanel.classList.add(this.classes.panelIn)

                if (this.params.onPanelShow && typeof this.params.onPanelShow === 'function') {
                    this.params.onPanelShow(nextPanel)
                }

                this.params._animationInProgress = false
            })
        }
    }

    windowResizeHandler() {
        clearTimeout(this.params._resizeTimer)

        this.params._resizeTimer = setTimeout(() => {
            if (this.params._active) {
                let activePanel = Array.prototype.find.call(this.panels, panel => panel.classList.contains(this.classes.panelActive))

                if (activePanel) this.setPanelContainerHeight(activePanel)
            }
        }, 250)
    }
}