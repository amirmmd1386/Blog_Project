let ps = paragraphElement.getElementsByTagName('p')
inputElement.addEventListener("keypress", (event) => {
    if (event.keyCode === 32) {
        adds(paragraphElement, inputElement)
        pValues = ""
        for (const p of ps) {
            pValues += p.textContent.trim() + '-';
            taged.value = pValues
        }
    }
    
});
paragraphElement.addEventListener('click', (e) => {
   
    if (e.target.tagName == "P") {
        pValues = ""
        e.target.remove()

        for (const p of ps) {
            pValues += p.textContent.trim() + '-';
            taged.value = pValues
        }
    }
})