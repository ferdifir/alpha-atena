function get_status_trans(v_link, v_idtranskey, v_idtrans, callback) {
    const form = new FormData();
    form.append(v_idtranskey, v_idtrans);
    fetch(base_url_api + v_link + "/get-status-trans", {
        method: "POST",
        body: form,
        cache: "no-cache",
    })
        .then((response) => response.json())
        .then((data) => callback(data))
        .catch((error) => console.error("Error:", error));
}

function getCurrentDateTime() {
    const now = new Date();

    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, "0");
    const day = String(now.getDate()).padStart(2, "0");
    const hours = String(now.getHours()).padStart(2, "0");
    const minutes = String(now.getMinutes()).padStart(2, "0");
    const seconds = String(now.getSeconds()).padStart(2, "0");

    return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
}

async function getCetakDocument(url) {
    try {
        const response = await fetchData(url, null, false);
        return response;
    } catch (e) {
        const error = typeof e === "string" ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert("Error", textError, "error");
        return null;
    }
}
