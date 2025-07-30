 // Detect the 'Print Screen' key and clear the clipboard
 document.addEventListener("keyup", function(event) {
    if (event.key === "PrintScreen") {
        // Clear clipboard content to make screenshot blank
        navigator.clipboard.writeText("").then(function() {
            alert("Screenshots are not allowed on this website.");
        }).catch(function(err) {
            console.error("Clipboard write failed:", err);
        });
    }
});

// Disable right-click to prevent context menu for additional screen capturing
document.addEventListener("contextmenu", function(event) {
    event.preventDefault();
    alert("Right-click is disabled on this website.");
});

// Detect attempts to open developer tools
document.addEventListener("keydown", function(event) {
    if (event.ctrlKey && (event.key === "s" || event.key === "S")) {
        alert("Saving this page is disabled.");
        event.preventDefault();
    }

    if (event.ctrlKey && event.shiftKey && (event.key === "i" || event.key === "I")) {
        alert("Inspecting this page is disabled.");
        event.preventDefault();
    }

    if (event.key === "F12") {
        alert("Developer tools are disabled.");
        event.preventDefault();
    }
});