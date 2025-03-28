import toggles from './toggles'

toggles()

document.addEventListener('DOMContentLoaded', (event) => {
  setTimeout(() => {
    document.body.classList.add('dom-loaded')
  }, 100)
})
