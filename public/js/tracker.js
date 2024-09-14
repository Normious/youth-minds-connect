// Simple Progress Tracker
let progress = 60; // Start with 60% progress (example)

function trackProgress() {
    if (progress < 100) {
        progress += 10; // Increment progress by 10% for each completion
        document.querySelector(".progress-fill").style.width = progress + "%";
        document.querySelector(".progress-fill").textContent = progress + "%";

        // Check if rewards should be added
        if (
            progress >= 30 &&
            !document
                .querySelector(".rewards ul")
                .innerHTML.includes("Mindfulness Master Badge")
        ) {
            document.querySelector(".rewards ul").innerHTML +=
                "<li>Mindfulness Master Badge (Earned for 30% completion)</li>";
        }
        if (
            progress >= 50 &&
            !document
                .querySelector(".rewards ul")
                .innerHTML.includes("Fitness Champion Badge")
        ) {
            document.querySelector(".rewards ul").innerHTML +=
                "<li>Fitness Champion Badge (Earned for 50% completion)</li>";
        }
    }
}