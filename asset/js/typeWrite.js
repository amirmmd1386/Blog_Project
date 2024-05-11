let FuncTypeWrite = (text, title1, title2, title3, title4) => {
    let typewriter = new Typewriter(text, {
        loop: true
    });
    typewriter.typeString(title1)
        .pauseFor(2500)
        .deleteAll()
        .typeString(title2)
        .pauseFor(2500)
        .deleteAll()
        .typeString(title3)
        .pauseFor(2500)
        .deleteAll()
        .typeString(title4)
        .pauseFor(2500)
        .start();
}

