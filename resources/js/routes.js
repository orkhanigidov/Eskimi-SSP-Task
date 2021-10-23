import AllAd from "./components/AllAd.vue";
import CreateAd from "./components/CreateAd.vue";
import EditAd from "./components/EditAd.vue";

export const routes = [
    {
        name: "home",
        path: "/",
        component: AllAd
    },
    {
        name: "create",
        path: "/create",
        component: CreateAd
    },
    {
        name: "edit",
        path: "/edit/:id",
        component: EditAd
    }
];
