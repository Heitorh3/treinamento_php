import axios from 'axios';

const axiosConfig = axios.create({
	headers: {
		'Content-type': 'application/json',
		'X-Requested-With': 'XMLHttpRequest'
	},
	baseURL: 'http://localhost:8080',
});

export default axiosConfig;