import CONFIG from '../../config';

const state = {
    educations: [],
    education: {}
};

const mutations = {
    setEducations(state, educations) {
        state.educations = educations;
    },
    setEducation(state, education) {
        state.education = education;
    },
    deleteEducation(state, educationId) {
        let index = state.educations.findIndex(item => {
            return item.id === educationId;
        });
        if(index !== 1){
            state.educations.splice(index, 1);
        }
    }
};

const actions = {
    getEducations(context) {
        return axios.get(`${CONFIG.CANDIDATE_URL}/educacoes`)
            .then(response => {
                context.commit('setEducations', response.data);
            });
    },
    getEducation(context, educationId) {
        return axios.get(`${CONFIG.CANDIDATE_URL}/educacoes/${educationId}/edit`)
            .then(response => {
                context.commit('setEducation', response.data);
            });
    },
    storeEducation(context, data) {
        return axios.post(`${CONFIG.CANDIDATE_URL}/educacoes`, data);
    },
    updateEducation(context, data) {
        return axios.put(`${CONFIG.CANDIDATE_URL}/educacoes/${data.id}`, data);
    },
    deleteEducation(context, id) {
        return axios.delete(`${CONFIG.CANDIDATE_URL}/educacoes/${id}`).then(() =>{
           context.commit('deleteEducation', id);
        });
    }
};

export default {
    namespaced: true,
    state,
    mutations,
    actions
}