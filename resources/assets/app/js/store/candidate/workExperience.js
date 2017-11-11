import CONFIG from '../../config';

const state = {
    workExperiences: [],
    workExperience: {}
};

const mutations = {
    setWorkExperiences(state, workExperiences) {
        state.workExperiences = workExperiences;
    },
    setWorkExperience(state, workExperience) {
        state.workExperience = workExperience;
    },
    deleteWorkExperience(state, workExperienceId) {
        let index = state.workExperiences.findIndex(item => {
            return item.id === workExperienceId;
        });
        if(index !== 1){
            state.workExperiences.splice(index, 1);
        }
    }
};

const actions = {
    getWorkExperiences(context) {
        return axios.get(`${CONFIG.CANDIDATE_URL}/experiencias`)
            .then(response => {
                context.commit('setWorkExperiences', response.data);
            });
    },
    getWorkExperience(context, workExperienceId) {
        return axios.get(`${CONFIG.CANDIDATE_URL}/experiencias/${workExperienceId}/edit`)
            .then(response => {
                context.commit('setWorkExperience', response.data);
            });
    },
    storeWorkExperience(context, data) {
        return axios.post(`${CONFIG.CANDIDATE_URL}/experiencias`, data);
    },
    updateWorkExperience(context, data) {
        return axios.put(`${CONFIG.CANDIDATE_URL}/experiencias/${data.id}`, data);
    },
    deleteWorkExperience(context, id) {
        return axios.delete(`${CONFIG.CANDIDATE_URL}/experiencias/${id}`).then(() =>{
            context.commit('deleteWorkExperience', id);
        });
    }
};

export default {
    namespaced: true,
    state,
    mutations,
    actions
}