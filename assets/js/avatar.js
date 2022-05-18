var personalImage = document.querySelector('.personal-image');
var personalFigure = document.querySelector('.personal-image_figure');
personalImage.querySelector("input").addEventListener("change", function () {
    if (this.files[0]) {
        var fr = new FileReader();
        fr.addEventListener("load", function () {
            personalFigure.querySelector("img").src = fr.result;
        }, false);
        fr.readAsDataURL(this.files[0]);
    }
});