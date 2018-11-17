export default class Gate{
    
    constructor(user){
        this.user = user;
    }

    idProfile(){
        return this.user.id
    }

    nameProfile(){
        return this.user.name
    }

    isAdmin(){
        return this.user.role === 'Admin';
    }

    isUser(){
        return this.user.role === 'User';
    }
}