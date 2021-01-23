import cv2
import dlib

detector = dlib.get_frontal_face_detector()
img = cv2.imread("asset/_upload/RGB/Muhamad Maulana.jpeg")
cv2.imshow(winname="Face", mat=img)
cv2.waitKey(delay=0)
cv2.destroyAllWindows()