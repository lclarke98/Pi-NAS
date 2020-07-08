window.addEventListener('load', pageLoad)

function pageLoad() {
    document.getElementById("open-adduser-modal").addEventListener("click", openAddUserModal)
}

function activateOverlay() {
    document.getElementById("overlay").classList.add("overlay");
}

function deactivateOverlay() {
    document.getElementById("overlay").classList.remove("overlay");
}

function openAddUserModal() {
    document.getElementById("adduser-modal").style.display = "block";
    document.getElementById("close-adduser-modal").addEventListener("click", closeAddUserModal)
    activateOverlay()
}

function closeAddUserModal() {
    document.getElementById("adduser-modal").style.display = "none"
    document.getElementById("main-content").style.pointerEvents = "all";
    deactivateOverlay()
}