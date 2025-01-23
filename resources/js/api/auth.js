import { BASE_URL } from "../constant";

export const authApi = {
    register: (userData) => {
        return $.ajax({
            url: `${BASE_URL}/auth/register`,
            method: "POST",
            contentType: "application/json",
            data: JSON.stringify(userData),
        });
    },

    login: (credentials) => {
        return $.ajax({
            url: `${BASE_URL}/auth/login`,
            method: "POST",
            contentType: "application/json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: JSON.stringify(credentials),
        });
    },

    logout: () => {
        return $.ajax({
            url: `${BASE_URL}/auth/logout`,
            method: "POST",
            headers: {
                Authorization: `Bearer ${localStorage.getItem("token")}`,
            },
            complete: () => {
                localStorage.removeItem("token");
            },
        });
    },
};
