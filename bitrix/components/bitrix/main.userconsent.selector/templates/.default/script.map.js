{"version":3,"file":"script.min.js","sources":["script.js"],"names":["MainUserConsentSelectorManager","params","this","selectors","init","actionRequestUrl","initSlider","contexts","document","querySelectorAll","BX","convert","nodeListToArray","forEach","initByContext","context","selector","querySelector","linkEdit","linkView","push","bind","onChange","initSliderButtons","style","display","value","fillHrefByTemplate","a","path","getAttribute","href","replace","RegExp","fillDropDownControl","node","items","skipExistedFirstElement","firstChildElement","children","innerHTML","appendChild","item","caption","option","createElement","selected","innerText","list","slider","bindOpen","top","Bitrix24","Slider","caller","addCustomEvent","close","onSliderClose","sendActionRequest","data","selectorNode","selectedValue","ID","map","NAME","fireEvent","PageSlider","bindAnchors","rules","condition","loader","stopParameters","onSaved","onClose","resetLastOpenPage","removeOpenPage","apply","element","openHref","e","preventDefault","open","url","reloadAfterClosing","loadHandler","getCurrentPage","w","getWindow","iframe","action","sendData","callbackSuccess","callbackFailure","sessid","bitrix_sessid","ajax","method","timeout","dataType","processData","onsuccess","proxy","error","onfailure","text"],"mappings":"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"}