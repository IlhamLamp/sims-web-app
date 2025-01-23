import { BASE_URL } from "../constant";

export const userApi = {
    getProfile: async () => {
        return $.ajax({
            url: `${BASE_URL}/auth/profile`,
            method: "GET",
            headers: {
                Authorization: `Bearer ${localStorage.getItem("token")}`,
                Accept: "application/json",
            },
        });
    },

    updateProfile: async (userData) => {
        return $.ajax({
            url: `${BASE_URL}/auth/profile`,
            method: "PUT",
            contentType: "application/json",
            headers: {
                Authorization: `Bearer ${localStorage.getItem("token")}`,
            },
            data: JSON.stringify(userData),
        });
    },
};

window.userApi = userApi;
