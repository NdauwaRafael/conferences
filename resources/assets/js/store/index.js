import Vue from 'vue';
import Vuex from 'vuex';


Vue.use(Vuex);


const state = {

    workshop:[],

};

const getters = {

    workshop: state => {
        return state.workshop
    }
};

const mutations = {

    GET_WORKSHOP(state) {
    state.workshop = JSON.parse(localStorage.getItem('workshoplist'));
}
};



const actions = {

};


const store = new Vuex.Store({
    state,
    getters,
    mutations,
    actions
});
store.commit('GET_WORKSHOP');
export default store
