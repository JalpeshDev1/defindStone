const headerNotification = () => {

    // Check if the notification was previously closed
    if (sessionStorage.getItem("notificationClosed") === "true") {
        document.getElementById("notificationBar").style.display = "none";
    } else {
        document.getElementById("notificationBar").style.display = "flex";
    }


    const closeNotificationButton = document.getElementById('close-notification');

    closeNotificationButton.addEventListener('click', closeNotification)

    function closeNotification() {
        var notificationBar = document.getElementById("notificationBar");

        notificationBar.style.display = "none";
        notificationBar.style.height = "0";
        notificationBar.style.transition = "height 0.5s ease";

        setTimeout(function () {
            notificationBar.style.display = "none";
        }, 500);

        sessionStorage.setItem("notificationClosed", "true");
    }

}

export default headerNotification