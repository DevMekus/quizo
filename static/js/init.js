import Application from "./controllers/Application.js";
import RouteCrawler from "./controllers/RouteMonitor.js";

function initializeAndRunAllMethods(classInstance) {
  const methods = Object.getOwnPropertyNames(
    Object.getPrototypeOf(classInstance)
  ).filter(
    (prop) =>
      typeof classInstance[prop] === "function" && prop !== "constructor"
  );

  methods.forEach((method) => classInstance[method]());
}

const app = new Application();
const crawler = new RouteCrawler();

initializeAndRunAllMethods(app);
initializeAndRunAllMethods(crawler);
