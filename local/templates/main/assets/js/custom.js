document.addEventListener('DOMContentLoaded', function () {
    const sm = new SmartPhoto(".js-img-viwer", {
        showAnimation: false
    });

    document.querySelectorAll('pre code').forEach((block) => {
        hljs.highlightBlock(block);
    });
});