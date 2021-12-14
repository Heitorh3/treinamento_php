import http from './http';

async function users() {
	try {
		const { data } = await http.get('/api/users');
		  console.log(data);
	} catch (error) {
		  console.log(error);
	}
}

export default users;