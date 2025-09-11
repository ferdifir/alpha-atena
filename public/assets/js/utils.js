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

async function getCetakDocument(token, url, body) {
    try {
        const response = await fetchData(token, url, body, false);
        return response;
    } catch (e) {
        const error = typeof e === "string" ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert("Error", textError, "error");
        return null;
    }
}

function isTokenExpired(token) {
    if (!token) {
        return true;
    }

    try {
        const payloadBase64 = token.split(".")[1];
        const decodedPayload = atob(payloadBase64);
        const payload = JSON.parse(decodedPayload);

        const expirationTime = payload.exp;
        const currentTime = Math.floor(Date.now() / 1000);

        return expirationTime < currentTime;
    } catch (e) {
        console.error("Gagal mendekode token JWT:", e);
        return true;
    }
}

function getTglFilterAwal() {
    const today = new Date();
    today.setDate(today.getDate() - 2);
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, "0");
    const day = String(today.getDate()).padStart(2, "0");
    return year + "-" + month + "-" + day;
}

async function fetchData(token, url, body, isJson = true) {
    try {
        let headers = {
            Authorization: "Bearer " + token,
        };
        let requestBody = null;

        if (body instanceof FormData) {
            requestBody = body;
        } else {
            headers["Content-Type"] = "application/json";
            requestBody = body ? JSON.stringify(body) : null;
        }

        const response = await fetch(url, {
            method: "POST",
            headers: headers,
            body: requestBody,
        });

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        if (isJson) {
            return await response.json();
        } else {
            return await response.text();
        }
    } catch (e) {
        const error = typeof e === "string" ? e : e.message;
        const textError = getTextError(error);
        $.messager.alert("Error", textError, "error");
    }
}
