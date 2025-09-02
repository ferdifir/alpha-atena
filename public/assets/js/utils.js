function get_status_trans(v_link, v_idtranskey, v_idtrans, callback) {
	fetch(base_url + v_link + '/get-status-trans', {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json',
		},
		body: JSON.stringify({
			v_idtranskey: v_idtrans,
		}),
		cache: 'no-cache'
	})
	.then(response => response.json())
	.then(data => callback(data))
	.catch(error => console.error('Error:', error));
}
