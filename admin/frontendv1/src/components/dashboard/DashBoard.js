import React from "react";
import { useState, useContext } from "react";
//node_modules/bootstrap/dist/css/bootstrap.min.css
import "../../../node_modules/bootstrap/dist/css/bootstrap.min.css";
import { Row, Col } from "react-bootstrap";
import styles from "./Home.module.css";
import ProgressBar from "../ui/progress/ProgressBar";
import DoughnutChart from "../ui/charts/DoughNutChart.js";
import VerticalChart from "../ui/charts/VerticalChart";

const DashBoard = () => {
  const monthWatse = {
    value: {
      revenue: [20, 23, 45, 65, 100, 60, 80],
      income: [10, 13, 30, 50, 70, 50, 60],
    },
    month: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
  };

  const tasksJanitor = 70;
  const tasksCollector = 70;
  const monthWaste = 36353000;
  const [target, setTarget] = useState(23);
  const tasksTotal = 150;
  const targetDone = (target * 100) / tasksTotal;
  

  return (
    <React.Fragment>
      <Row>
        <div className={styles.container}>
          <div className={styles.statistic}>
            <Col xl={4} md={4} sm={12}>
              <div className={styles.targetContainer}>
                <h6 className={styles.containerTitle}>PRODUCTS SOLD</h6>
                <div className={styles.targetNumber}>{target}</div>
                <div className={styles.lineDivider}></div>
                <div className={styles.progressBar}>
                  <ProgressBar value={targetDone} />
                </div>
              </div>
            </Col>

            <Col xl={4} md={4} sm={12}>
              <div className={styles.cartContainer}>
                <h6 className={styles.containerTitle}>CARD</h6>
                <div className={styles.cartChart}>
                  <span className={styles.textPie}>
                    Purchase<br />
                    {/* {targetsJanitor}% */}
                  </span>
                  <DoughnutChart dataInput={[10, 20, 30, 5]} size={120} />
                </div>
              </div>
            </Col>

            <Col xl={4} md={4} sm={12}>
              <div className={styles.onlineContainer}>
                <h6 className={styles.containerTitle}>USER</h6>
                <div className={styles.onlineChart}>
                  <span className={styles.textPie}>
                    Online  <br /> {tasksCollector}%
                  </span>
                  <DoughnutChart dataInput={[10, 20]} size={120} />
                </div>
              </div>
            </Col>
          </div>
        </div>
      </Row>
      <Row>
        <div className={styles.monthlyChart}>
          <h6 className={styles.monthlyChartTitle}>Monthly (VND)</h6>
          <div className={styles.monthlyChartContent}>
            {Intl.NumberFormat().format(monthWaste)}
            {/*<div className={styles.}></div> */}
          </div>
          <VerticalChart dataInput={monthWatse} size={600} />
        </div>
      </Row>
    </React.Fragment>
  );
};

export default DashBoard;