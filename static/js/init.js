import Application from "./controllers/Application";

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
initializeAndRunAllMethods(app);
