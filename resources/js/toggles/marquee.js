const marquee = () => {

    const root = document.documentElement;

    if (document.querySelector(".marquee")) {
        const marqueeElementsDisplayed = getComputedStyle(root).getPropertyValue(
            "--marquee-elements-displayed"
        );
        const marqueeContent = document.querySelector("ul.marquee-content");

        root.style.setProperty("--marquee-elements", marqueeContent.children.length);

        for (let i = 0; i < marqueeElementsDisplayed; i++) {
            marqueeContent.appendChild(marqueeContent.children[i].cloneNode(true));
        }
    }

}

export default marquee
