import "./bootstrap";

import React from "react";
import ReactDOM from "react-dom/client";
import FoodController from "./controllers/FoodController";
import "../css/app.css"; // jika kamu punya file CSS bawaan Laravel

ReactDOM.createRoot(document.getElementById("app")).render(
    <React.StrictMode>
        <FoodController />
    </React.StrictMode>
);
