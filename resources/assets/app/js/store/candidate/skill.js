import CONFIG from '../../config';

const state = {
    skills: [],
    skill: {}
};

const mutations = {
    setSkills(state, skills) {
        state.skills = skills;
    },
    setSkill(state, skill) {
        state.skill = skill;
    },
};

const actions = {
    getSkills(context) {
        return axios.get(`${CONFIG.CANDIDATE_URL}/skills`)
            .then(response => {
                context.commit('setSkills', response.data)
            });
    },
    getSkill(context, id) {
        return axios.get(`${CONFIG.CANDIDATE_URL}/skills/${id}`)
            .then(response => {
                context.commit('setSkill', response.data);
            });
    },
    storeSkill(context, data) {
        return axios.post(`${CONFIG.CANDIDATE_URL}/skills`, data);
    },
    updateSkill(context, {data, id}) {
        return axios.put(`${CONFIG.CANDIDATE_URL}/skills/${id}`, data);
    },
    removeSkill(context, id) {
        return axios.delete(`${CONFIG.CANDIDATE_URL}/skills/${id}`);
    }
};

export default {
    namespaced: true,
    state,
    mutations,
    actions
}