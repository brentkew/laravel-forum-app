import Token from "./Token";
import AppStorage from "./AppStorage";

class User {


    login(data) {
        axios.post('/api/auth/login', data)
            .then( (res)=> this.responseAfterLogin(res))
            .catch( error => console.log(error) );
    }


    responseAfterLogin(res) 
    {
        console.log(res);
    
        const access_token = res.data.access_token;
        if(Token.isValid(access_token)) {            
            AppStorage.store(res.data.user,res.data.access_token)
        }
    }

    hasToken() {
        const storedToken = AppStorage.getToken();
        if(storedToken) {
            return Token.isValid(storedToken) ? true : false
        }

        return false;
    }

    loggedIn() {
        return this.hasToken();
    }

    loggedOut() {
        AppStorage.clear();
    }

    name() {
        return AppStorage.getUser();
    }

    id() {
        const access_token = AppStorage.getToken();
        if(access_token) {
            const payload = Token.payload(access_token);
            return payload.sub;
        }
            
        return false;
    }

}



export default User = new User();