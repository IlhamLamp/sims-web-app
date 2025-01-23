import { BASE_URL } from "../constant";

export const userApi = {
    async getProfile() {
        const response = await fetch(`${BASE_URL}/profile`, {
            headers: {
                Authorization: `Bearer ${localStorage.getItem("token")}`,
                Accept: "application/json",
            },
        });
        return response.json();
    },

    async updateProfile(userData) {
        const response = await fetch(`${BASE_URL}/profile`, {
            method: "PUT",
            headers: {
                Authorization: `Bearer ${localStorage.getItem("token")}`,
                "Content-Type": "application/json",
                Accept: "application/json",
            },
            body: JSON.stringify(userData),
        });
        return response.json();
    },
};
