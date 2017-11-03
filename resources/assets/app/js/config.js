const location = window.location;

export default {
    HOST: `${location.protocol}//${location.hostname}:${location.port}`,
    get CANDIDATE_URL(){
        return `${this.HOST}/candidato`;
    },
    get RECRUITER_URL(){
        return `${this.HOST}/recrutador`;
    }
}