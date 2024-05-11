let navText = document.querySelector('.Title');
FuncTypeWrite(navText, 'هر چی میخوای میتونی اینجا پیدا کنی', 'از شیر مرغ تا جون آدمیزاد مثل اطلاعات برنامه نویسی', '<strong>از اونا هم هست💦</strong>', '<strong>منظورم شنا این چیزا بود😅</strong>')
const inputElement = document.querySelector("#tag");
const paragraphElement = document.querySelector("#tagAdd");
const inputTag = document.querySelector("#tagInsert");
const paragraphEl = document.querySelector("#tagInsertAdd");
const tagIn = document.querySelector("#tagIn");
const taged = document.querySelector("#tagedit");
let px = paragraphEl.getElementsByTagName('p')
let a = document.querySelectorAll('.catHref')
const catText = document.querySelector('#catText')
const catShow = document.querySelector('.catShow')
let link = ["", ""]
for (let index = 0; index < a.length; index++) {
    link[index] = a[index].href

}
catShow.addEventListener('click', (e) => {
    if (e.target.className == "col-12 p-1 rounded bg-sky-blue text-center catP") {
        catText.value = e.target.innerText;
        for (let index = 0; index < a.length; index++) {
            a[index].href = link[index] + catText.value;
        }
    }
})
catText.addEventListener("keypress", (e) => {
    if (e.keyCode == 13) {
        for (let index = 0; index < a.length; index++) {
            a[index].href = link[index] + catText.value;
        }
    }
})
let str = ""
let pValues = "";
inputTag.addEventListener("keypress", (event) => {
    if (event.keyCode === 32) {
        adds(paragraphEl, inputTag)
        inputTag.value = ""
        pValues = ""
        for (const p of px) {
            pValues += p.textContent.trim() + '-';
            tagIn.value = pValues
        }
    }
});
paragraphEl.addEventListener('click', (e) => {
    if (e.target.tagName == "P") {
        pValues = ""
        e.target.remove()

        for (const p of px) {
            pValues += p.textContent.trim() + '-';
            tagIn.value = pValues
        }
    }
})
let adds = (e, input) => {
    let p = document.createElement('p');
    p.className = "px-2  bg-sky-blue rounded position-relative"
    let inputValue = input.value;
    p.innerText = inputValue;
    let span = document.createElement('span')
    span.className = "position-absolute top-0 mt-1 me-4 start-100 translate-middle badge rounded-pill"
    let i = document.createElement('i')
    i.className = "i fa fa-close z-3 i-danger h6"
    span.append(i)
    p.append(span)
    e.append(p);
    str += inputValue + '-'
    inputElement.value = "";
    i.addEventListener("click", () => {
        span.parentElement.remove()
    })

}
let edit = (e) => {
    location.replace(`index.php?editId=${e}&admin=1`)
}

let del = (e) => {
    Swal.fire({
        title: "مطمئنی میخوای حذف کنی؟",
        text: "بپا که به گ... نری",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "GREEN",
        cancelButtonColor: "#d33",
        confirmButtonText: "اره بابا",
        cancelButtonText: "غلط کردم"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                confirmButtonColor: "blue",
                confirmButtonText: "اوکی",
                title: "خلبان بمرده",
                text: "مطلب کوشته شد",
                icon: "success"
            }).then(() =>
                location.replace(`delete.php?id=${e}`)
            )
        }
    });
}

let delSug = (id, e) => {
    e.style.border = "2px solid red";
    setTimeout(() => {
        location.replace('delSug.php?id=' + id)

    }, 1000)
}
let delLink = (id, e) => {
    e.style.backgroundColor = "red";
    setTimeout(() => {
        location.replace('link.php?idDel=' + id)

    }, 1000)
}

let score = (e) => {
    location.replace('index.php?idText='+e);
    let enScore = document.getElementById('id')
    enScore.value =""
    enScore.value = e;
}

let resetUrl = ()=>{
    location.replace('index.php');
}