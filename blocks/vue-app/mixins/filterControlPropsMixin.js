export const filterControlPropsMixin = {
  props: {
    index: Number,
    id: String,
    type: String,
    label: String,
    name: String,
    isChanged: Boolean,
    checked: Boolean,
    disabled: Boolean,
    values: {type: Array, default: () => ([])},
    options: {type: Object, default: () => ({})},
  },
}