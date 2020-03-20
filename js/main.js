const listRef = document.getElementById("tasks");

listRef.addEventListener("click", function (e) {
    e.preventDefault();
    if (e.target.nodeName === "BUTTON") {
        const idToEdit = e.target.parentElement.parentElement.dataset.mijnid;
        console.log(idToEdit)
    }
});