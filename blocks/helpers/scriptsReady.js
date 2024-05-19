const scripts = []
const runningFunctions = []

const sendEventToClient = scripts => {
  document.dispatchEvent(new CustomEvent('async-js:check', {detail: {scripts: scripts}}))
}

const scriptsReadyManager = () => {
  document.addEventListener('async-js:onload', (event) => {
    if (event.detail && event.detail.src) {
      scripts.push(event.detail.src)
      sendEventToClient(scripts)
    }
  });
}

const scriptsReady = (payload = {name: null, scripts: [], func: null}) => {
  let needLoaded = payload.scripts.length && payload.name && typeof payload.func === 'function'

  if (needLoaded) {
    document.addEventListener('async-js:check', event => {
      if (event.detail && event.detail.scripts && checkReady(payload.scripts, event.detail.scripts) && checkFunction(payload.name)) {
        payload.func()
        runningFunctions.push(payload.name)
      }
    });
  }
}

const checkReady = (scripts, needScripts) => {
  if (!needScripts.length) {
    return false
  }

  for (let i = 0; i < scripts.length; i++) {
    if (!needScripts.includes(scripts[i])) {
      return false
    }
  }

  return true
}

const checkFunction = name => {
  return !runningFunctions.includes(name)
}

export {scriptsReadyManager, scriptsReady}
