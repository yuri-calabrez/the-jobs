import Vuex from 'vuex';
import Education from './candidate/education';
import WorkExperience from './candidate/workExperience';

export default new Vuex.Store({
    modules: {
        Education,
        WorkExperience
    }
})