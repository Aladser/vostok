export const forwardZero = number => number > 9 ? number : '0' + number

export const formatNumber = number => number.toString().replace(/(?!^)(?=(?:\d{3})+(?:\.|$))/gm, ' ');

export const formatFileSize = (filesize, measures = []) => {
  const fileSizeMeasures = measures.length ? measures : ['b', 'kb', 'Mb']
  let i = 0

  while (Math.floor(filesize / 1024) > 0 && i < fileSizeMeasures.length) {
    i++
    filesize /= 1024
  }

  return `${Math.round(filesize)} ${fileSizeMeasures[i]}`
}

