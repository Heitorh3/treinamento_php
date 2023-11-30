import http from './http';

async function users() {
	try {
		const { data } = await http.get('/api/users');
		console.log(JSON.stringify(data, null, 2));
	} catch (error) {
		console.log(error);
	}
}

export default users;