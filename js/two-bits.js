(function () {
    const head = document.getElementsByTagName("head")
    const inlineCSS = document.getElementById("custom-background-css")
    if(inlineCSS) {
        inlineCSS.parentNode.removeChild(inlineCSS)
    }
}())
