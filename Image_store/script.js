async function submitForm() {
    var formData = new FormData(document.getElementById("myForm"));

    try {
        // AJAX request to the PHP script
        const response = await fetch("submit.php", {
            method: "POST",
            body: formData,
        });

        if (response.ok) {
            // On success, update the data list
            updateDataList();
        } else {
            console.error("Submit failed:", response.statusText);
        }
    } catch (error) {
        console.error("Error during submit:", error);
    }
}

async function updateDataList() {
    try {
        // AJAX request to retrieve data from the PHP script
        const response = await fetch("retrieve.php");

        if (response.ok) {
            // Update the data list with retrieved data
            const dataListElement = document.getElementById("dataList");
            dataListElement.innerHTML = await response.text();
        } else {
            console.error("Data retrieval failed:", response.statusText);
        }
    } catch (error) {
        console.error("Error during data retrieval:", error);
    }
}

// Load initial data on page load
updateDataList();
