<script>
    import Vue from 'vue';
    export default {
        name: 'welcome'
    }
</script>

<template>
            <div class="welcome-banner">
                <div class="background-covered">
                    <div class="grid-container">
                        <div class="centered-banner-text">
                            <h3>Organize your Workshop Like A pro</h3>
                                <router-link :to="{ path: '/login'}" replace>
                                    <el-button type="primary" round>
                                    Get Started
                                    </el-button>
                                </router-link>

                        </div>
                    </div>
                </div>

            </div>
</template>
