import  { legacy_createStore as createStore } from "redux";// defaults to localStorage for web
import rootReducer from "./reducers";

// const persistConfig = {
//         key: 'root',
//         storage,
//         whiteList: []
//       }
      
// const persistedReducer = persistReducer(persistConfig, rootReducer)
export const store = createStore(
    rootReducer,
  window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__()
  
  )
// export const persistor = persistStore(store)

// export default(store, persistor)
export default store;