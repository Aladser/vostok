import {Accordion} from "../accordion/Accordion";

export default () => {
    const accordion = document.querySelector('.index-faq-list')

    if (accordion) {
        new Accordion({
            selectors: {
                accordion: '.index-faq-list',
                item: '.index-faq-item',
                trigger: '.index-faq-item-top',
                hidden: '.index-faq-item-hidden'
            },
            classes: {
                opened: 'index-faq-item_opened',
            },
            defaultOpenIndexes: 0,
        })
    }
}
